// Package weather contains Forecast function.
package weather

// CurrentCondition is a string variable with current condition.
var CurrentCondition string
// CurrentLocation is a string variable with current location.
var CurrentLocation string

// Forecast function, shows current condition in current location.
func Forecast(city, condition string) string {
	CurrentLocation, CurrentCondition = city, condition
	return CurrentLocation + " - current weather condition: " + CurrentCondition
}
