function loadFilters(keys, values)
{
    //alert(keys + " : " + values);
    const keysArr = keys.split(",");
    const valuesArr = values.split(",");
    var noOfFilters = 0;
    const tableObj = document.getElementById("data-table");

    var rows;
    var row;
    var tds;
    var filterDropdown;
    var optionValue;
    var options;

    if(tableObj)
    {
        if(tableObj.tBodies && tableObj.tBodies.length > 0)
        {
            rows = tableObj.tBodies[0].rows;
            noOfFilters = keysArr.length
        }
    }

    for(var index = 0; index < noOfFilters; index++)
    {
        options = [];
        //console.log(keysArr[index] + " : " + valuesArr[index]);
        filterDropdown = document.getElementById(keysArr[index]+"#"+valuesArr[index]);
        //console.log(filterDropdown);
        for(var i = 0; i < rows.length; i ++)
        {
            row = rows[i];
            tds = row.children;
            if(tds[valuesArr[index]])
            {
                optionValue = rows[i].children[valuesArr[index]].innerText;
                if(!options.includes(optionValue))
                {
                    options.push(optionValue);
                    filterDropdown.add(new Option(optionValue, optionValue));
                }
            }
        }
    }
}

function filterData(keys, values)
{
    //console.log(keys + " : " + values);
    const tableObj = document.getElementById("data-table");
    const keysArr = keys.split(",");
    const valuesArr = values.split(",");
    const noOfFilters = keysArr.length;
    var filterValues = {};

    for(var index = 0; index < noOfFilters; index++)
    {
        filterId = keysArr[index]+"#"+valuesArr[index];
        if(document.getElementById(filterId).value)
        {
            filterValues[valuesArr[index]] = document.getElementById(filterId).value;
        }
    }
    //tableObj.tBodies[0].innerHTML = "";
    //console.log(filterValues);

    var rows = tableObj.tBodies[0].rows;
    var noOfRows = rows.length;
    var filterIndex;
    var row;
    var tds;
    var tdValue;
    var displayRow;

    for(var index = 0; index < noOfRows; index++)
    {
        displayRow = true;
        row = rows[index];
        tds = row.children;
        //console.log(tds);
        //console.log("Each row : ", row);
        for(var fIndex = 0; fIndex < noOfFilters; fIndex ++)
        {
            //console.log("Filter Index : " + fIndex + " : " + noOfFilters);
            filterIndex = valuesArr[fIndex];
            //console.log(tds[filterIndex]);
            tdValue = tds[filterIndex].innerText;

            //console.log(filterIndex + " : " + filterValues[filterIndex] + " : " + tdValue);
            //console.log(index + " : " + filterIndex + " : " + tdValue);

            if(filterValues[filterIndex] && filterValues[filterIndex] != tdValue)
            {
                displayRow = false;
                break;
            }
        }

        if(!displayRow)
        {
            row.style.display = "none";
        }
        else
        {
            row.style.display = "";
        }
    }
}

function clearFilters(keys, values)
{
    //alert(keys + " : " + values);
    const keysArr = keys.split(",");
    const valuesArr = values.split(",");
    const noOfFilters = keysArr.length;
    var filterDropdown;

    for(var index = 0; index < noOfFilters; index++)
    {
        filterDropdown = document.getElementById(keysArr[index]+"#"+valuesArr[index]);
        filterDropdown.selectedIndex = 0;
    }

    filterData(keys, values);
}