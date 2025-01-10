function smartColumns() {
  $("ul.column").css({ width: "100%" });

  var colWrap = $("ul.column").width();
  var colNum = Math.floor(colWrap / 200);
  var colFixed = Math.floor(colWrap / colNum);

  $("ul.column").css({ width: colWrap });
  $("ul.column li").css({ width: colFixed });
}

smartColumns();

$(window).resize(function () {
  smartColumns();
});
