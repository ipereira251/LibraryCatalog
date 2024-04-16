<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link href="adv_search_style.css" type="text/css" rel="stylesheet">

  <!-- Browser Tab title -->
  <title>UTD Library</title>

</head>

<body onpageshow="start()">
  <nav class="navbar fixed-top navbar-light" style="background-color: #3EA055;">
    <a class="navbar-brand" href="#" ><img src="comet.png" style="height: 40px; width: 200px;" alt="UTD     Comet Icon"></a>
  </nav>
  <div class="adv-search-sidebar">
    <h2><b>Search the Catalog</b></h2><hr><br>
    <h3>Advanced Search</h3>
    <div class="container">
      <form name="adv-search" onsubmit="return validateForm()">
        <script>
          function start(){
          //// AUTHOR
          document.getElementById('author-andor-3').style.display = 'none';
          document.getElementById('author-contains-3').style.display = 'none';
          document.getElementById('author-search-3').style.display = 'none';
          document.getElementById('author-nl-3').style.display = 'none';

          /*
          document.getElementById('author-andor-4').style.display = 'none';
          document.getElementById('author-contains-4').style.display = 'none';
          document.getElementById('author-search-4').style.display = 'none';
          document.getElementById('author-nl-4').style.display = 'none';

          document.getElementById('author-andor-5').style.display = 'none';
          document.getElementById('author-contains-5').style.display = 'none';
          document.getElementById('author-search-5').style.display = 'none';*/

          //// TITLE 
          document.getElementById('title-andor-3').style.display = 'none';
          document.getElementById('title-contains-3').style.display = 'none';
          document.getElementById('title-search-3').style.display = 'none';
          document.getElementById('title-nl-3').style.display = 'none';
          /*

          document.getElementById('title-andor-4').style.display = 'none';
          document.getElementById('title-contains-4').style.display = 'none';
          document.getElementById('title-search-4').style.display = 'none';
          document.getElementById('title-nl-4').style.display = 'none';

          document.getElementById('title-andor-5').style.display = 'none';
          document.getElementById('title-contains-5').style.display = 'none';
          document.getElementById('title-search-5').style.display = 'none';
*/
          //// PUBLICATION YEAR
          document.getElementById("pub-year-or").style.display = "none";
          document.getElementById("pub-year-min-2").style.display = "none";
          document.getElementById("pub-year-max-2").style.display = "none";
          document.getElementById("pub-year-min-2-label").style.display = "none";
          document.getElementById("pub-year-max-2-label").style.display = "none";


          //// RATING
          document.getElementById("rating-or").style.display = "none";
          document.getElementById("rating-min-2").style.display = "none";
          document.getElementById("rating-max-2").style.display = "none";
          document.getElementById("rating-min-2-label").style.display = "none";
          document.getElementById("rating-max-2-label").style.display = "none";
            
          //GENRE 
        
            

          //// LANGUAGE
          //document.getElementByClass('collapsible').style.display = 'none';
          //collapsible.classList.toggle("active");
          

          //// ISBN
          document.getElementById('isbn-andor-2').style.display = 'none';
          document.getElementById('isbn-contains-2').style.display = 'none';
          document.getElementById('isbn-search-2').style.display = 'none';

        }
        </script>
        <!--<button type="button" id="adv-search-submit">Submit</button>-->

        <!-- AVAILABILITY -->
        <h3>Availability: </h3>
        <input type="radio" name="avail" id="avail-on-shelf">
        <label for="avail-on-shelf">On shelf only</label>
        <input type="radio" name="avail" id="avail-all">
        <label for="avail-all">All</label>
        <!-- AUTHOR -->
        <!-- 1st search term -->
        <h3>Author: </h3>
        Author  <select name="author-contains-1" id ="author-contains-1">
            <option value="contains-author-1">Contains</option>
            <option value="is-exactly-author-1">Is exactly</option>
        </select>
        <input type="search" id="author-search-1">
        <!-- 2nd search term -->
        <br> 
        <select name="author-andor-2" id="author-andor-2">
          <option value="and">And</option>
          <option value="or">Or</option>
        </select>
        <select name="author-contains-2" id="author-contains-2">
          <option value="contains-author-2">Contains</option>
          <option value="is-exactly-author-2">Is exactly</option>
        </select>
        <input type="search" id="author-search-2">
        <button type="button" onclick="newlineAuthor2()" id="author-nl-2">+ Add New Line</button>
        <br>
        <!-- 3rd search term -->
        <select name="author-andor-3" id="author-andor-3" >
          <option value="and">And</option>
          <option value="or">Or</option>
        </select>
        <select name="author-contains-3" id="author-contains-3" >
          <option value="contains-author-3">Contains</option>
          <option value="is-exactly-author-3" >Is exactly</option>
        </select>
        <input type="search" id="author-search-3" >
        <!--button type="button" onclick="newlineAuthor3()" id="author-nl-3">+ Add New Line</button>
        <br>
        <!-- 4th search term 
        <select name="author-andor-4" id="author-andor-4" >
          <option value="and">And</option>
          <option value="or">Or</option>
        </select>
        <select name="author-contains-4" id="author-contains-4" >
          <option value="contains-author-4">Contains</option>
          <option value="is-exactly-author-4" >Is exactly</option>
        </select>
        <input type="search" id="author-search-4" >
        <button type="button" onclick="newlineAuthor4()" id="author-nl-4">+ Add New Line</button>
        <br>
        <!-- 5th search term 
        <select name="author-andor-5" id="author-andor-5" >
          <option value="and">And</option>
          <option value="or">Or</option>
        </select>
        <select name="author-contains-5" id="author-contains-5" >
          <option value="contains-author-5">Contains</option>
          <option value="is-exactly-author-5" >Is exactly</option>
        </select>
        <input type="search" id="author-search-5" >
        <br>--->
        

        <!-- TITLE -->
        <!-- 1st search term -->
        <h3>Title: </h3>
        Title  <select name="title-contains-1" id ="title-contains-1">
            <option value="contains-title-1">Contains</option>
            <option value="is-exactly-title-1">Is exactly</option>
        </select>
        <input type="search" id="title-search-1">
        <!-- 2nd search term -->
        <br> 
        <select name="title-andor-2" id="title-andor-2">
          <option value="and">And</option>
          <option value="or">Or</option>
        </select>
        <select name="title-contains-2" id="title-contains-2">
          <option value="contains-title-2">Contains</option>
          <option value="is-exactly-title-2">Is exactly</option>
        </select>
        <input type="search" id="title-search-2">
        <button type="button" onclick="newlineTitle2()" id="title-nl-2">+ Add New Line</button>
        <br>
        <!-- 3rd search term -->
        <select name="title-andor-3" id="title-andor-3" >
          <option value="and">And</option>
          <option value="or">Or</option>
        </select>
        <select name="title-contains-3" id="title-contains-3" >
          <option value="contains-title-3">Contains</option>
          <option value="is-exactly-title-3" >Is exactly</option>
        </select>
        <input type="search" id="title-search-3" >
        <!--button type="button" onclick="newlineTitle3()" id="title-nl-3">+ Add New Line</button>
        <br>
        <!-- 4th search term 
        <select name="title-andor-4" id="title-andor-4" >
          <option value="and">And</option>
          <option value="or">Or</option>
        </select>
        <select name="title-contains-4" id="title-contains-4" >
          <option value="contains-title-4">Contains</option>
          <option value="is-exactly-title-4" >Is exactly</option>
        </select>
        <input type="search" id="title-search-4" >
        <button type="button" onclick="newlineTitle4()" id="title-nl-4">+ Add New Line</button>
        <br>
        <!-- 5th search term 
        <select name="title-andor-5" id="title-andor-5" >
          <option value="and">And</option>
          <option value="or">Or</option>
        </select>
        <select name="title-contains-5" id="title-contains-5" >
          <option value="contains-title-5">Contains</option>
          <option value="is-exactly-title-5" >Is exactly</option>
        </select>
        <input type="search" id="title-search-5" >
        <br>
        -->

        <!---->
        <script>
        function newlineAuthor2(){
          document.getElementById('author-nl-2').style.display = 'none';
          document.getElementById('author-andor-3').style.display = 'inline';
          document.getElementById('author-contains-3').style.display = 'inline';
          document.getElementById('author-search-3').style.display = 'inline';
          //document.getElementById('author-nl-3').style.display = 'inline';
        }
        /*
        function newlineAuthor3(){
          document.getElementById('author-nl-3').style.display = 'none';
          document.getElementById('author-andor-4').style.display = 'inline';
          document.getElementById('author-contains-4').style.display = 'inline';
          document.getElementById('author-search-4').style.display = 'inline';
          document.getElementById('author-nl-4').style.display = 'inline';
        }
        function newlineAuthor4(){
          document.getElementById('author-nl-4').style.display = 'none';
          document.getElementById('author-andor-5').style.display = 'inline';
          document.getElementById('author-contains-5').style.display = 'inline';
          document.getElementById('author-search-5').style.display = 'inline';
        }*/
        

        function newlineTitle2(){
          document.getElementById('title-nl-2').style.display = 'none';
          document.getElementById('title-andor-3').style.display = 'inline';
          document.getElementById('title-contains-3').style.display = 'inline';
          document.getElementById('title-search-3').style.display = 'inline';
          //document.getElementById('title-nl-3').style.display = 'inline';
        }
        /*
        function newlineTitle3(){
          document.getElementById('title-nl-3').style.display = 'none';
          document.getElementById('title-andor-4').style.display = 'inline';
          document.getElementById('title-contains-4').style.display = 'inline';
          document.getElementById('title-search-4').style.display = 'inline';
          document.getElementById('title-nl-4').style.display = 'inline';
        }
        function newlineTitle4(){
          document.getElementById('title-nl-4').style.display = 'none';
          document.getElementById('title-andor-5').style.display = 'inline';
          document.getElementById('title-contains-5').style.display = 'inline';
          document.getElementById('title-search-5').style.display = 'inline';
        }*/
        </script>
        <!-- PUB YEAR -->
        <h3>Publication year: </h3>
        <label for="pub-year-min-1" id="pub-year-min-1-label">From </label>
        <input type="search" id="pub-year-min-1" name="pub-year-min-1">
        <label for="pub-year-max-1" id="pub-year-max-1-label"> to </label>
        <input type="search" id="pub-year-max-1" name="pub-year-max-1">
        <p id="pub-year-or">or</p>
        <button type="button" onclick="newlineYear1()" id="year-nl-1">+ Add New Line</button>
        <br>
        <label for="pub-year-min-2" id="pub-year-min-2-label">from </label>
        <input type="search" id="pub-year-min-2" name="pub-year-min-2">
        <label for="pub-year-max-2" id="pub-year-max-2-label"> to </label>
        <input type="search" id="pub-year-max-2" name="pub-year-max-2">

        <script>
          function newlineYear1(){
          document.getElementById("year-nl-1").style.display = 'none';
          document.getElementById("pub-year-or").style.display = 'inline';
          document.getElementById("pub-year-min-2").style.display = 'inline';
          document.getElementById('pub-year-min-2-label').style.display = 'inline';
          document.getElementById('pub-year-max-2').style.display = 'inline';
          document.getElementById('pub-year-max-2-label').style.display = 'inline';
        }
        </script>

        <!-- RATING -->
        <h3>Rating: </h3>
        <label for="rating-min-1" id="rating-min-1-label">From </label>
        <input type="search" id="rating-min-1">
        <label for="rating-max-1" id="rating-max-1-label"> to </label>
        <input type="search" id="rating-max-1">
        <p id="rating-or">or</p>
        <button type="button" onclick="newlineRating1()" id="rating-nl-1">+ Add New Line</button>
        <br>
        <label for="rating-min-2" id="rating-min-2-label">from </label>
        <input type="search" id="rating-min-2">
        <label for="rating-max-2" id="rating-max-2-label"> to </label>
        <input type="search" id="rating-max-2">

        <script>
          function newlineRating1(){
          document.getElementById("rating-nl-1").style.display = 'none';
          document.getElementById("rating-or").style.display = 'inline';
          document.getElementById("rating-min-2").style.display = 'inline';
          document.getElementById("rating-min-2-label").style.display = 'inline';
          document.getElementById('rating-max-2').style.display = 'inline';
          document.getElementById("rating-max-2-label").style.display = 'inline';
          }
        </script>

        <!-- GENRE -->
        <h3>Genre: </h3>
        <details>
          <summary>Open/Close</summary>
          <div class="row">
            <div class="column first">
              <input type="checkbox" id="fantasy">
              <label for="fantasy">Fantasy</label> <br>
              <input type="checkbox" id="scifi">
              <label for="scifi">Science Fiction</label> <br>
              <input type="checkbox" id="ya">
              <label for="ya">Young Adult</label> <br>
              <input type="checkbox" id="hist-fic">
              <label for="hist-fic">Historical, Historical Fiction</label> <br>
              <input type="checkbox" id="sci">
              <label for="sci">Science</label> <br>
              <input type="checkbox" id="lit-crit">
              <label for="lit-crit">Literary Criticism</label> <br>
              <input type="checkbox" id="mystery">
              <label for="mystery">Mystery</label> <br>
              <input type="checkbox" id="poetry">
              <label for="poetry">Poetry</label> <br>
              <input type="checkbox" id="phil">
              <label for="phil">Philosophy</label> <br>
              <input type="checkbox" id="biography">
              <label for="biography">Biography</label> <br>
              <input type="checkbox" id="history">
              <label for="history">History</label> <br>
              <input type="checkbox" id="health">
              <label for="health">Health</label> <br>
            </div>
            <div class="column second">
              <input type="checkbox" id="fiction">
              <label for="fiction">Fiction</label> <br>
              <input type="checkbox" id="nonfiction">
              <label for="nonfiction">Nonfiction</label> <br>
              <input type="checkbox" id="edu">
              <label for="edu">Education</label> <br>
              <input type="checkbox" id="romance">
              <label for="romance">Romance</label> <br>
              <input type="checkbox" id="econ, finance">
              <label for="econ, finance">Economics, Finance</label> <br>
              <input type="checkbox" id="plays">
              <label for="plays">Plays</label> <br>
              <input type="checkbox" id="classics">
              <label for="classics">Classics</label> <br>
              <input type="checkbox" id="self-help">
              <label for="self-help">Self-Help</label> <br>
              <input type="checkbox" id="horror">
              <label for="horror">Horror</label> <br>
              <input type="checkbox" id="humor">
              <label for="humor">Humor</label> <br>
              <input type="checkbox" id="socsci">
              <label for="socsci">Social Science</label> <br>
              <input type="checkbox" id="mystery, crime">
              <label for="mystery, crime">Mystery, Crime</label> <br>
            </div>
          </div>
        </details>



        <!-- LANGUAGE -->
        <h3>Language: </h3> 
        <details>
          <summary>Open/Close</summary>
          <div class="row">
            <div class="column first">
              <input type = "checkbox" id = "eng">
              <label for = "eng">English</label> <br>
              <input type = "checkbox" id = "spa">
              <label for = "spa">Spanish</label> <br>
              <input type = "checkbox" id = "grc">
              <label for = "grc">Ancient Greek</label> <br>
              <input type = "checkbox" id = "ger">
              <label for = "ger">German</label> <br>
              <input type = "checkbox" id = "ara">
              <label for = "ara">Arabic</label> <br>
              <input type = "checkbox" id = "zho">
              <label for = "zho">Mandarin</label> <br>
              <input type = "checkbox" id = "por">
              <label for = "por">Portuguese</label> <br>
              <input type = "checkbox" id = "ita">
              <label for = "ita">Italian</label> <br>
              <input type = "checkbox" id = "msa">
              <label for = "msa">Malay</label> <br>
              <input type = "checkbox" id = "wel">
              <label for = "wel">Welsh</label> <br>
              <input type = "checkbox" id = "nor">
              <label for = "nor">Norwegian</label> <br>
              <input type = "checkbox" id = "gla">
              <label for = "gla">Scottish Gaelic</label> <br>
              
            </div>

            <div class="column second">
              <input type = "checkbox" id = "fre">
              <label for = "fre">French</label> <br>
              <input type = "checkbox" id = "mul">
              <label for = "mul">Multiple</label> <br>
              <input type = "checkbox" id = "enm">
              <label for = "enm">Middle English</label> <br>
              <input type = "checkbox" id = "jpn">
              <label for = "jpn">Japanese</label> <br>
              <input type = "checkbox" id = "nl">
              <label for = "nl">Dutch</label> <br>
              <input type = "checkbox" id = "lat">
              <label for = "lat">Latin</label> <br>
              <input type = "checkbox" id = "srp">
              <label for = "srp">Serbian</label> <br>
              <input type = "checkbox" id = "rus">
              <label for = "rus">Russian</label> <br>
              <input type = "checkbox" id = "glg">
              <label for = "glg">Galician</label> <br>
              <input type = "checkbox" id = "swe">
              <label for = "swe">Swedish</label> <br>
              <input type = "checkbox" id = "tur">
              <label for = "tur">Turkish</label> <br>
              <input type = "checkbox" id = "ale">
              <label for = "ale">Aleut</label> <br>
              
            </div> <br>
            </div>
          </details>
          <script>
            /*
            var collapsible = document.getElementByClass("collapsible");
            collapsible.addEventListener("click", function(){
              var content = collapsible.nextElementSibling;
              if(content.style.display === "block") {
                  content.style.display = "none";
                } else {
                  content.style.display = "block";
                }
            });*/
          </script>

          <!-- ISBN -->
          <h3>ISBN: </h3>
          ISBN  <select name="isbn-contains-1" id ="isbn-contains-1">
          <option value="contains-isbn-1">Contains</option>
          <option value="is-exactly-isbn-1">Is exactly</option>
          </select>
          <input type="search" id="isbn-search-1">
          <button type="button" onclick="newlineISBN1()" id="isbn-nl-1">+ Add New Line</button>

          <!-- 2nd search term -->
          <br> 
          <select name="isbn-andor-2" id="isbn-andor-2">
          <option value="and">And</option>
          <option value="or">Or</option>
          </select>
          <select name="isbn-contains-2" id="isbn-contains-2">
          <option value="contains-isbn-2">Contains</option>
          <option value="is-exactly-isbn-2">Is exactly</option>
          </select>
          <input type="search" id="isbn-search-2">

          <script>
            //// ISBN 
            function newlineISBN1(){
              document.getElementById('isbn-nl-1').style.display = 'none';
              document.getElementById('isbn-andor-2').style.display = 'inline';
              document.getElementById('isbn-contains-2').style.display = 'inline';
              document.getElementById('isbn-search-2').style.display = 'inline';

            }
          </script>
        <br>
        <script>
          //INPUT VALIDATION
          function validateForm(){
            //AVAILABILITY
            //defaults to "on shelf only" so no issues here

            //AUTHOR
            let author1 = document.forms["adv-search"]["author-search-1"].value;
            let author2 = document.forms["adv-search"]["author-search-2"].value;
            let author3 = document.forms["adv-search"]["author-search-3"].value;
            let author4 = document.forms["adv-search"]["author-search-4"].value;
            let author5 = document.forms["adv-search"]["author-search-5"].value;

            //TITLE
            let title1 = document.forms["adv-search"]["title-search-1"].value;
            let title2 = document.forms["adv-search"]["title-search-2"].value;
            let title3 = document.forms["adv-search"]["title-search-3"].value;
            let title4 = document.forms["adv-search"]["title-search-4"].value;
            let title5 = document.forms["adv-search"]["title-search-5"].value;
            
            //PUBLICATION YEAR
            let pubYearMin1 = document.forms["adv-search"]["pub-year-min"].value;
            let pubYearMax1 = document.forms["adv-search"]["pub-year-max"].value;
            if(pubYearMin1 > pubYearMax1){
              alert("Minimum year should be before maximum year. Please select a valid range for publication year.");
              return false;
            }
            if(pubYearMin2 > pubYearMax2){
              alert("Minimum year should be before maximum year. Please select a valid range for publication year.");
              return false;
            }
            if (pubYearMin1 == null){
              pubYearMin1 = 1900;
            }
            if (pubYearMax1 == null){
              pubYearMax1 = 2010;
            }
            if (pubYearMin2 == null){
              pubYearMin2 = 1900;
            }
            if (pubYearMax2 == null){
              pubYearMax2 = 2010;
            }
            if(pubYearMin1 < 1900 || pubYearMax1 > 2010 || pubYearMin2 < 1900 || pubYearMax2 > 2010){
              alert("Our catalog only contains books from 1900 to 2010. Please select a range for publication year.");
              return false;
            }

            //RATING
            let ratingMin = document.forms["adv-search"]["rating-min"].value;
            let ratingMax = document.forms["adv-search"]["rating-max"].value;
            if(ratingMin > ratingMax){
              alert("Minimum rating should be less than maximum rating. Please select a valud range for rating.");
              return false;
            }
            if (ratingMin == null){
              ratingMin = 0;
            }
            if (ratingMax == null){
              ratingMax = 5;
            }
            if(ratingMin < 0 || ratingMax > 5){
              alert("Our rating system is from 0 to 5. Please select a valid range for rating.");
              return false;
            }

            //GENRE 


            //LANGUAGE

            //ISBN


            //if nothing is selected
          }
        </script>
        <input type="submit" value="Submit">
    </form>
    </div>
  </div>
</body>
</html>
