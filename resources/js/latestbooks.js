const url = '/api/books/latest'

const loadData = async () => {
    const response = await fetch(url);
    const parsedData = await response.json();



    parsedData.data.forEach(data => {

        console.log(data);

        const listElement = document.getElementById('latestBooks');
        const paragraphElement = document.getElementById('latestBooksDescription');

        let newList = document.createElement("li");
        let newImg = document.createElement("img");
        let newBr = document.createElement("br");

        newImg.src = data.image;


        newList.innerText = data.title + " | Price: " + data.price + " | Author(s): ";
        data.authors.forEach(author => {
            newList.innerText += author.name + ", ";
        });
        

        newList.appendChild(newBr);
        newList.appendChild(newImg);
        listElement.appendChild(newList);
        paragraphElement.innerText = data.description

    });
}


document.addEventListener('DOMContentLoaded', () => {

    const button = document.getElementById('loadBooksBtn');

    button.addEventListener('click', loadData);
})