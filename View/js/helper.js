function upCaseFirst(str) 
{
    return str.substr(0,1).toUpperCase()+str.substr(1)
}

function returnUndefined(str)
{
    if (typeof str == "undefined"){
        return "--";
    }
    return str;
}