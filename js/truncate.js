// truncate text

function truncateText() {
  var text = document.getElementsByClassName(".card p").innerHTML;
  var truncated = text.substring(0, 50) + "...";
  document.getElementById("text").innerHTML = truncated;
}