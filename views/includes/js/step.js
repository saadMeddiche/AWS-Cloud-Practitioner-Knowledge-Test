//HOw to get you the URL of the current page.
// https://stackoverflow.com/questions/16133491/detect-what-page-you-are-on-javascript

/* In This script we detect the current page
so we can know wich Link we will change its css 
by adding a new class "active" */

/* ======================== Home Page ======================== */
if (document.URL==("http://localhost/AWS-Cloud-Practitioner-Knowledge-Test/views/Home.php")){

    document.getElementById("Home").classList.add("active");

}

/* ======================== Test Page ======================== */
if (document.URL==("http://localhost/AWS-Cloud-Practitioner-Knowledge-Test/views/Test.php")){

    document.getElementById("Test").classList.add("active");

}

/* ======================== Results Page ======================== */
if (document.URL==("http://localhost/AWS-Cloud-Practitioner-Knowledge-Test/views/Results.php")){

    document.getElementById("Results").classList.add("active");

}

/* ======================== Help Page ======================== */
if (document.URL==("http://localhost/AWS-Cloud-Practitioner-Knowledge-Test/views/Help.php")){

    document.getElementById("Help").classList.add("active");

}





