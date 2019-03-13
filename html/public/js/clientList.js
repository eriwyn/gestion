/* 
 *Variables
 */

var currentPage = 1;
var pageNumber = $('.pagination a').length - 2;
var search = '';
var orderField = 'name';
var isDesc = false;

/* 
 *Functions 
 */


function initTable() {

  for (var i = 0; i < $(".sort").length; i++) {
    if ($(".sort")[i].classList.contains('asc')) {
      orderField = $(".sort")[i].id;
      isDesc = false;
    } else if ($(".sort")[i].classList.contains('desc')) {
      orderField = $(".sort")[i].id;
      isDesc = true;
    }
  }

  changePage();
}

function rewriteClientTable(data) {
  $("tbody").html("");
  for (var i = 0; i < data.length; i++) {
    var row = $("<tr>").attr('id', data[i].id);

    var clientName = $("<td>").addClass("clientName").append("<a>");
    var nameLink = $("<a>").attr('href', '?page=client&id=' + data[i].id).text(data[i].name);
    clientName.append(nameLink);

    var clientMail = $("<td>");
    var mailLink = $("<a>").attr("href", "mailto:" + data[i].mail).text(data[i].mail)
    clientMail.append(mailLink);

    var clientTel = $("<td>");
    var telLink = $("<a>").attr("href", "tel:" + data[i].tel).text(data[i].tel)
    clientTel.append(telLink);

    row.append(clientName, clientMail, clientTel);
    $("tbody").append(row);
  }

  $('tbody').show('fast');
}

function rewriteClientPagination(data) {
  $(".pagination").html("");

  var previous = $("<a>").attr({
    href: "#",
    id: "previous"
  }).text("<");

  $(".pagination").append(previous);

  for (var i = 0; i < data/10; i++) {
    var link = $("<a>").attr({
      href:"#",
      id:'page' + (i + 1)
    }).text(i + 1);
    $(".pagination").append(link);
  }

  var next = $("<a>").attr({
    href: "#",
    id: "next"
  }).text(">");

  $(".pagination").append(next);

  currentPage = 1;
  $('#page' + currentPage).addClass("currentPage");
}

function changePage() {
  $('tbody').hide('fast', function(){
    $.get('/ajax/searchClient.php', {page: currentPage, search: search, orderField: orderField, isDesc: isDesc}).done(rewriteClientTable);
  });
  $('.pagination a').removeClass("currentPage");
  $('#page' + currentPage).addClass("currentPage");
}

/* 
 *Event Functions 
 */

function onSearchClients(e) {
  $('tbody').hide('fast', function(){
    search = e.target.value;
    changePage();
  });

  $.get('/ajax/countClient.php', {string: e.target.value}).done(rewriteClientPagination);
}

function onPageClick(e) {
  e.preventDefault();

  if (this.id == "previous") {
    if (currentPage > 1) {
      currentPage --;
    }
  } else if(this.id == "next") {
    if (currentPage < pageNumber) {
      currentPage ++;
    }
  } else if(this.id == "first") {
      currentPage = 1;
  } else if(this.id == "last") {
      currentPage = pageNumber;
  } else {
    currentPage = this.id.slice(4);
  }

  changePage();

  return true;
}

function onSort(e) {
  e.preventDefault();
  currentPage = 1;
  orderField = e.target.id;

  $(".sort").not(this).removeClass("desc");
  $(".sort").not(this).removeClass("asc");

  if($(e.target).hasClass("asc") || $(e.target).hasClass("desc")) {
    $(e.target).toggleClass("desc");
    $(e.target).toggleClass("asc");
    isDesc = !isDesc;
  } else {
    $(e.target).addClass("asc");
    isDesc = false;
  }
  changePage();
}

function shortcuts(e) {
  $('.currentPage').removeClass("currentPage");

  switch (e.key) {
    case 'PageUp':
      if (currentPage > 1) {
        currentPage --;
      }
      break;
    case 'PageDown':
      if (currentPage < pageNumber) {
        currentPage ++;
      }
      break;
    case 'Home':
      currentPage = 1;
      break;
    case 'End':
      currentPage = pageNumber;
      break;
    default:

  }

  $('#page' + currentPage).addClass("currentPage");
  changePage(currentPage);
}

/*
 * Main
 */

$(function () {
  initTable();
  $('#page' + currentPage).addClass("currentPage");
  $('.pagination').on('click', 'a', onPageClick);
  $('#searchClient').on('keyup', onSearchClients);
  $('.sort').on('click', onSort);
  document.onkeydown = shortcuts;
});
