var SearchBar = document.getElementById('search-bar');

document.getElementById('checkSearch').addEventListener('click',function(){
    if (SearchBar.style.display === 'none' || SearchBar.style.display === ''  ){
        SearchBar.style.display = 'inline-block';
    } else {
        SearchBar.style.display = 'none';
    }
});