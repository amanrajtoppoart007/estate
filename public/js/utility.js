function reloadUrl($tableElement) 
{
    if(!$($tableElement).find('div').length) 
    {
        window.location.href = window.location.href;
    }
}
