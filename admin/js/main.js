function show1(event) {
			if (event.target.files.length>0) {
				var src = URL.createObjectURL(event.target.files[0]);
				var preview = document.getElementById("file1");
				preview.src=src;
				console.log(preview);
			}

		}
		function show2(event) {
			if (event.target.files.length>0) {
				var src = URL.createObjectURL(event.target.files[0]);
				var preview = document.getElementById("file2");
				preview.src=src;
				console.log(preview);
			}

		}
		function show3(event) {
			if (event.target.files.length>0) {
				var src = URL.createObjectURL(event.target.files[0]);
				var preview = document.getElementById("file3");
				preview.src=src;
				console.log(preview);
			}

		}
		function show4(event) {
			if (event.target.files.length>0) {
				var src = URL.createObjectURL(event.target.files[0]);
				var preview = document.getElementById("file4");
				preview.src=src;
				console.log(preview);
			}

		}
