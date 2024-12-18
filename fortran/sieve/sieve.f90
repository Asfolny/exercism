module sieve
  implicit none

contains

  function primes(limit) result(array)
    integer, intent(in) :: limit
    integer, allocatable :: array(:), marked(:)
    integer :: cnt_p, cnt_m, i, j

    if (limit < 2) then
      allocate(array(0))
      return
    end if

    allocate(marked(limit))
    cnt_p = 0
    cnt_m = 1
    
    do i = 2, limit
      if (any(marked == i)) cycle

      cnt_p = cnt_p + 1

      do j = i+i, limit, i
        if (any(marked == j)) cycle
        marked(cnt_m) = j
        cnt_m = cnt_m + 1
      end do      
    end do

    allocate(array(cnt_p))
    cnt_p = 1
    do i = 2, limit
      if (any(marked == i)) cycle
      array(cnt_p) = i
      cnt_p = cnt_p + 1
    end do

  end function primes

end module sieve
