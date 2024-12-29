module binary_search
  implicit none
contains

  function find(array, val) result(idx)
    integer, dimension(:), intent(in) :: array
    integer, intent(in) :: val
    integer :: lo, hi, idx

    lo = 1
    hi = size(array)

    do while (lo <= hi)
      idx = (lo + hi) / 2
      if (array(idx) == val) then
        return
      else if (array(idx) > val) then
        hi = idx - 1
      else
        lo = idx + 1
      end if
    end do

    idx = -1
  end function

end module