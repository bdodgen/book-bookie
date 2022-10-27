const loadData = async () => {
  // load data from the endpoint
  // wait for it to arrive
  const url = '/api/books/latest';
  const response = await fetch(url);
  const data = await response.json();
  const element = document.querySelector('#latest-books');

  // loop through the data
  data.forEach((book) => {
    //for each item generate an element within
    // #latest-book element
    element.innerHTML += `
      <div>
        <h3>${book.title}</h3>
        <img src="${book.image} alt="">
        <li>Published: ${book.publication_date}</li>
      </div>
    `
  });
}

loadData();