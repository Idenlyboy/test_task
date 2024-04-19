window.onload = function()
{
    var Request = new XMLHttpRequest();
    Request.open("GET", "/backend/Controllers/ContactController/ContactController.php");
    Request.send();
    
    Request.onload = function()
    {
        var data = Request.response;
        alert(data);
        var table = document.querySelector('.table');
        var td_name = document.createElement('td');
        var td_number = document.createElement('td');
        var tr = document.createElement('tr');
        td_name = this.response.data['name'];
        td_number = this.response.data['number'];
        tr.appendChild(td_name);
        tr.appendChild(td_number);
        table.appendChild(tr);
    }
/*
    var Request = new XMLHttpRequest();
    Request.open("POST", "/backend/Controllers/ContactController/ContactController.php");
    Request.send();
    
    Request.onload = function()
    {
        var data = Request.response;
        var table = document.querySelector('.table');
        var td_name = document.createElement('td');
        var td_number = document.createElement('td');
        var tr = document.createElement('tr');
        td_name = this.response.data['name'];
        td_number = this.response.data['number'];
        tr.appendChild(td_name);
        tr.appendChild(td_number);
        table.appendChild(tr);
    }*/
}