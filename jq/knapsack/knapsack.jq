def subsets:
  if length > 0 then (.[:1] + (.[1:] | subsets)), (.[1:] | subsets) end;

[ .items = (.items | subsets)
  | select((.items | map(.weight) | add) <= .maximumWeight)
  | (.items | map(.value) | add) ]
| max // 0 

