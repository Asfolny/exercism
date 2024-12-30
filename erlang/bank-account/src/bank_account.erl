-module(bank_account).

-behaviour(gen_server).

-export([balance/1, charge/2, close/1, create/0, deposit/2, withdraw/2]).
-export([init/1, handle_call/3, handle_cast/2]).

balance(Pid) ->
  gen_server:call(Pid, balance).

charge(Pid, Amount) ->
    gen_server:call(Pid, {charge, Amount}).

close(Pid) ->
    gen_server:call(Pid, close).

create() ->
    case gen_server:start_link(?MODULE, [], []) of
        {ok, Pid} -> Pid;
        Err -> Err
    end.

deposit(Pid, Amount) ->
    gen_server:cast(Pid, {deposit, Amount}).

withdraw(Pid, Amount) ->
    gen_server:call(Pid, {withdraw, Amount}).

init(_Args) ->
    {ok, 0}.

handle_cast({deposit, _Amount}, account_closed) ->
    {noreply, account_closed};
handle_cast({deposit, Amount}, Balance) when Amount =< 0 ->
    {noreply, Balance};
handle_cast({deposit, Amount}, Balance) ->
    {noreply, Balance+Amount}.

handle_call(_Request, _From, account_closed) ->
    {reply, {error, account_closed}, account_closed};
handle_call({_Action, Amount}, _From, Balance) when Amount =< 0 ->
    {reply, 0, Balance};
handle_call({withdraw, Amount}, _From, Balance) when Amount >= Balance ->
    {reply, Balance, 0};
handle_call({withdraw, Amount}, _From, Balance) ->
    {reply, Amount, Balance-Amount};
handle_call({charge, Amount}, _From, Balance) when Amount > Balance->
    {reply, 0, Balance};
handle_call({charge, Amount}, _From, Balance) ->
    {reply, Amount, Balance-Amount};
handle_call(balance, _From, Balance) ->
    {reply, Balance, Balance};
handle_call(close, _From, Balance) ->
    {reply, Balance, account_closed}.
