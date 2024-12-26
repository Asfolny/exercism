let annotate input = 
  List.mapi (fun row line ->
    String.mapi (fun col c ->
      if c = ' ' then
        let sum = ref 0 in
        for x = max 0 (row - 1) to min (List.length input - 1) (row + 1) do
          for y = max 0 (col - 1) to min (String.length line - 1) (col + 1) do
            if (List.nth input x).[y] = '*' then
              sum := !sum + 1
          done
        done;
        " 123456789".[!sum]
      else c
    ) line
  ) input
