defmodule Newsletter do
  def read_emails(path) do
    File.read(path)
    |> then(fn {:ok, body} -> String.split(body, "\n", trim: true) end)
  end

  def open_log(path) do
    File.open!(path, [:write])
  end

  def log_sent_email(pid, email) do
    IO.puts(pid, email)
  end

  def close_log(pid) do
    File.close(pid)
  end

  def send_newsletter(emails_path, log_path, send_fun) do
    log = open_log(log_path)
    
    for email <- read_emails(emails_path) do
      sent = send_fun.(email)      
      if sent == :ok, do: log_sent_email(log, email)
    end
    
    close_log(log)
  end
end
