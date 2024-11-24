defmodule Chessboard do
  def rank_range, do: 1..8

  def file_range, do: 65..72

  def ranks, do: Enum.into(rank_range(), [])

  def files, do: Enum.into(file_range(), [], &(<<&1>>))
end
