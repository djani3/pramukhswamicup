/*!
 * 
 * Google Sheets To HTML v0.9a
 * 
 * To use, simply replace the "tq?key=" value in the
 * URL below with your own unique Google document ID
 * 
 * The Google document's sharing must be set to public
 * 
 */

google.load('visualization', '1', {
    packages: ['table']
});
var visualization;

function drawVisualization1() {
    var query1 = new google.visualization.Query('https://spreadsheets.google.com/tq?key=1a4JczbUiE4XaUCZXj5b-RhueeVC9Lmx9sk1IQ1OxE60&output=html&usp=sharing');
    query1.setQuery('SELECT A, B, C, D, E, F label A "Team", B "Pld", C "Won", D "Lost", E "Net RR", F "Pts"');
    query1.send(handleQueryResponse1);
}

function handleQueryResponse1(response) {
    if (response.isError()) {
        alert('There was a problem with your query: ' + response.getMessage() + ' ' + response.getDetailedMessage());
        return;
    }
    var data = response.getDataTable();
    visualization = new google.visualization.Table(document.getElementById('showpoints'));
    visualization.draw(data, {
        allowHtml: true,
        legend: 'bottom'
    });
}
google.setOnLoadCallback(drawVisualization1);


