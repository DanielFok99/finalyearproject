


const generateOutput = (input, output, index) => {
// If we have reached the end of the input array, return the output array
if (index >= input.length) {
return output;
}

// Create a new array to store the updated output
const newOutput = [];

// Iterate through the current elements in the input array
for (const elem of input[index]) {
// Iterate through the current elements in the output array
for (const outputElem of output) {
// Add the current element from the input array to the current element in the output array
newOutput.push(`${outputElem},${elem}`);
}
}

// Call the function again with the next index and the updated output array
return generateOutput(input, newOutput, index + 1);
}