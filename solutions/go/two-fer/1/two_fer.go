
package twofer

// ShareWith returns a string with Two Fer text
func ShareWith(name string) string {
	if (name == "") {
	    name = "you"
	}
	return "One for " + name + ", one for me."
}
