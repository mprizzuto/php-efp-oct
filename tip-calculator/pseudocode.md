# tip calculator

## inputs
- bill amount
- tip

## processes
- convert inputs from strings to numbers

- express tip as percent

- multipy tip * billAmount to find the applied tip

- multiply tip * billAmount -> add to  billAmount to find total


## outputs
- bill amount
- tip expressed as percent
- tip expressed as dollars
- total

## pseudocode
- prompt for bill amount and point result ot billAmount

- prompt for tip and point result to tip

- convert tip to percent. tip / 100 

- to find the tip, multiply tip * billAmount and point the result ot tipApplied

- initialize total to empty string

- if user inputs invalid input, display appropriate error messages
	- for empty strings say "required"
	- for non-numerical data, say "numbers only"
	- for foreign characters say "no foreign characters"

- pass variables to calculateBill function and output the result
