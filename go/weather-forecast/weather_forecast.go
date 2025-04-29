// Package weather that forecasts the weather.
package weather

// CurrentCondition : stores the current weather condition.
var CurrentCondition string
// CurrentLocation : stores the current location.
var CurrentLocation string

// Forecast the weather.
func Forecast(city, condition string) string {
	CurrentLocation, CurrentCondition = city, condition
	return CurrentLocation + " - current weather condition: " + CurrentCondition
}
