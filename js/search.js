let searchDistrict = document.getElementById("searchDistrict");
let suggestionsDistrict = document.getElementById("suggestions");
let searchBtn = document.getElementById("searchBtn");

let cities = [];

fetch("./json/main.json")
  .then((res) => {
    return res.json();
  })
  .then((d) => {
    cities = d;
    console.log(d);
  })
  .catch((error) => {
    console.log("error");
    console.log(error);
  });

let miniSearch = new MiniSearch({
  fields: ["district_name"], // fields to index for full-text search
  storeFields: ["district_name", "id"], // fields to return with search results
});

miniSearch.addAll(cities);
searchDistrict.addEventListener("keyup", (e) => {
  const suggestions = miniSearch.autoSuggest(e.target.value);
  console.log(suggestions);
  const searchResultHtml = suggestions.map((suggestion) => {
    return `<li><a style="text-decoration: none; color:red;" >${suggestion.suggestion}</a></li>`;
  });
  suggestionsDistrict.innerHTML = searchResultHtml.join("");
});

searchBtn.addEventListener("click", () => {
  let searchInput = searchDistrict.value;
  let searchResult = miniSearch.search(searchInput);

  console.log(searchResult);

  if (searchResult.length > 0) {
    window.location.href = searchResult[0].link;
  }
});
