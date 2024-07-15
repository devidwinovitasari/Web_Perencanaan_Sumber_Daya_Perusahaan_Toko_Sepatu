
        function editRow(button) {
            var row = button.parentNode.parentNode;
            var cells = row.getElementsByTagName("td");
            var values = [];
            for (var i = 0; i < cells.length - 1; i++) {
                values.push(cells[i].innerHTML);
            }
            // Assuming you want to do something with the values, like fill a form for editing
            console.log("Values:", values);
        }

        function deleteRow(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }
