defmodule PaintByNumber do
  def palette_bit_size(color_count, n \\ 1), do:
    if(Integer.pow(2, n) >= color_count, do: n, else: palette_bit_size(color_count, n + 1))

  def empty_picture() do
    <<>>
  end

  def test_picture() do
    <<0b00::2, 0b01::2, 0b10::2, 0b11::2>>
  end

  def prepend_pixel(picture, color_count, pixel_color_index) do
    prepend_color_size = palette_bit_size(color_count)
    <<pixel_color_index::size(prepend_color_size), picture::bitstring>>
  end


  def get_first_pixel(<<>>, _color_count), do: nil
  def get_first_pixel(picture, color_count) do
    palette_size = palette_bit_size(color_count)
    <<value::size(palette_size), _rest::bitstring>> = picture
    value
  end

  def drop_first_pixel(<<>>, _color_count), do: <<>>
  def drop_first_pixel(picture, color_count) do
    palette_size = palette_bit_size(color_count)
    <<_value::size(palette_size), rest::bitstring>> = picture
    rest
  end

  def concat_pictures(picture1, picture2) do
    <<picture1::bitstring, picture2::bitstring>>
  end
end
