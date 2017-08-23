//listen for form submit
document.getElementById('myform').addEventListener('submit', saveBookmark);

function saveBookmark(e){
    //get form values
    var siteName = document.getElementById('siteName').value;
    var siteUrl = document.getElementById('siteUrl').value;
    
    if(!validateForm(siteName, siteUrl)){
        return false;   
    }
    
    var bookmark = {
        name: siteName,
        url: siteUrl
    }
    
    //local stroage text
//    localStorage.setItem('test', 'hello world');
    
    //test if bookmark array is present or not
    if(localStorage.getItem('bookmarks') === null){
        var bookmarks = [];
        bookmarks.push(bookmark);
        localStorage.setItem('bookmarks', JSON.stringify(bookmarks));
    } else{
        var bookmarks = JSON.parse(localStorage.getItem('bookmarks'));
        
        bookmarks.push(bookmark);
        
        localStorage.setItem('bookmarks', JSON.stringify(bookmarks));
    }
    
    //clear form
    document.getElementById('myform').reset();
    fetchBookmarks();
    //prevent form submit
    e.preventDefault();
}

//delete bookmark
function deleteBookmark(url){
//    console.log(url);
    var bookmarks = JSON.parse(localStorage.getItem('bookmarks'));
    
    for(var i = 0; i < bookmarks.length; i++){
        if(bookmarks[i].url == url){
            bookmarks.splice(i,1);
        }
    }
    
    localStorage.setItem('bookmarks', JSON.stringify(bookmarks));
    
    fetchBookmarks();
}

//fetch bookmarks
function fetchBookmarks(){
    var bookmarks = JSON.parse(localStorage.getItem('bookmarks'));
    
    var bookmarkResults = document.getElementById('bookmarkResults');
    
    bookmarkResults.innerHTML = '';
    
    for(var i = 0; i < bookmarks.length; i++){
        var name = bookmarks[i].name;
        var url = bookmarks[i].url;
        
        bookmarkResults.innerHTML += '<div class="well">'+'<h3>'+name+'  <a class="btn btn-default" target="_blank" href="'+url+'">Visit</a>  <a onclick="deleteBookmark(\''+url+'\')" class="btn btn-danger" href="#">Delete</a></h3></div>';
    }
}

function validateForm(siteName, siteUrl){
    if(!siteName || !siteUrl){
        alert('Please fill the form');
        return false;
    }
    
    var expression = /[-a-zA-Z0-9@:%_\+.~#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&//=]*)?/gi;
    var regex = new RegExp(expression);
    
    if(!siteUrl.match(regex)){
        alert('please enter a valid url');
        return false;
    }
    return true;
}