/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function addRecord()
{
    document.history.action = 'addRecord.php';
    document.history.submit();
} 
function modifyRecord()
{
    document.results.action = "modifyRecord.php";
    document.results.submit();
}
function deleteRecord()
{
    document.results.action = 'deleteRecord.php';
    document.results.submit();
}
