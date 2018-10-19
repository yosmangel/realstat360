  /* USEFUL FUNCTIONS */

  /* To change the checkbox status */
    function changeStatus(status, id){
    	if (status) {
    		return false;
    	}
    	return true;
    }

  /* Format the structure of an array  */
  function objectifyForm(formArray) {//serialize data function
      var returnArray = {};
      for (var i = 0; i < formArray.length; i++){
        returnArray[formArray[i]['name']] = formArray[i]['value'];
      }
      return returnArray;
    };