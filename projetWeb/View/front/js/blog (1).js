// Function to add a comment for a specific form
const addComment = function (form) {
    let nameValue = form.getElementsByClassName("in1")[0].value;
    let commentValue = form.getElementsByClassName("tex1")[0].value;

    // Check if the input and textarea values meet the conditions
    if (nameValue.length === 0 || commentValue.length < 8) {
        alert("Please fill in the required fields. Comment must be at least 8 words.");
        return;
    }

    let newDiv = document.createElement("div");

    let headingElement = document.createElement("h1");
    let textNode = document.createTextNode(nameValue);
    headingElement.appendChild(textNode);

    let commentParagraph = document.createElement("p");
    let commentTextNode = document.createTextNode(commentValue);
    commentParagraph.appendChild(commentTextNode);

    newDiv.appendChild(headingElement);
    newDiv.appendChild(commentParagraph);

    // Append the new div after the targeted form
    form.parentNode.insertBefore(newDiv, form.nextSibling);
};

// Add event listener to each form button
document.querySelectorAll(".comment-form button").forEach((button, index) => {
    button.addEventListener("click", (event) => {
        event.preventDefault(); // Prevent form submission
        addComment(event.target.form);
    });
});
