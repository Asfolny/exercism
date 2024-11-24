raindrops <- function(number) {
  rain <- list(
    ifelse(number %% 3 == 0, "Pling", ""),
    ifelse(number %% 5 == 0, "Plang", ""),
    ifelse(number %% 7 == 0, "Plong", "")
  )

  rain <- rain[rain != ""]

  if (length(rain) == 0) {
    return(as.character(number))
  }

  paste(rain, collapse="")
}
