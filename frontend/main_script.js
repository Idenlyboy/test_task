/*let url = "localhost:8000/backend/Controllers/ContactController/ContactController.php";
let response = await fetch(url);

if (response.ok)
{
    let json = await response.json();
    alert(json);
}
else
{
    alert("Ошибка HTTP:" + response.status);
}


window.onload = function()
{
    Request.onload = function()
    {
        let data = Request.response;
        alert(data);
        let table = document.querySelector('.table');
        let td_name = document.createElement('td');
        let td_number = document.createElement('td');
        let tr = document.createElement('tr');
        td_name = this.response.data['name'];
        td_number = this.response.data['number'];
        tr.appendChild(td_name);
        tr.appendChild(td_number);
        table.appendChild(tr);
    }

}*/