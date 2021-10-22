# input validator

## inputs
- **prompt for** *firstName*, *lastName*, *employeeId*, *zipCode*, *userMessage*

# processes
- **write regex** to check for aa-1234 *employee id* format
- **create a function for each type of validation**. **create a validateInput function and envokes the validation functions**

## outputs
<!-- the wrong way -->
- your firstName is jes *too short*

- your lastName is winh *too short*

- your employeeId is hhh-17373 *wrong format, must be in aa-1234 format*

- your zip is ss325 *wrong format, nums only*

<!-- the right way -->

- your firstName is marco

- your lastName is rizzuto 

- your employeeId is ba-1733

- your zip code is 11375

## pseudocode
- write a form and prompt for *firstName*, *lastName*, *employeeId*, *zipCode*, *userMessage* using the text inputs w/ associated labels

- output appropriate error message sif input is not valid

- point *firstName*, *lastName*, *employeeId*, *zipCode* to their respect keys in the POST superglobal variable

- create function *checkEmployeeId* that uses a regEx to enforce the *employeeId* format

- create function *checkZipCode* that uses a regEx to enforce the *zipCode* format

- create function *formatVar* that sanitizes the form data

- create *validateInput* function and invoke the validation functions. output appropriate error message that is a result of the logic of the different functions


