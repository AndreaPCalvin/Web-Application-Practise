function onlyOne(checkbox) {
	var checkboxes = document.getElementsByName('tipo')
	checkboxes.forEach((item) => {
		if (item !== checkbox) item.checked = false
	})
}
