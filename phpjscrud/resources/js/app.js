const app = {
	//cargar los paises
	url : "/app/app.php",
	paisesCargar: () => {		
		fetch(app.url + "?paises")
			.then(response => response.json())
			.then( rt => {			
				//console.log(rt);
				var sp = document.querySelector("#pais");
				for(var k in rt){
					var op = document.createElement("option");
					op.text = rt[k].Name;
					op.value = rt[k].Code;
					sp.appendChild(op);
				}
		}).catch( error => console.error("Hubo un error #1: ",error));
	},

	continentesCargar: () => {
		fetch(app.url + "?continente")
			.then(response => response.json())
			.then( rt => {			
				//console.log(rt);
				var sp = document.querySelector("#continente");
				for(var k in rt){
					var op = document.createElement("option");
					op.text = rt[k].Continent;
					op.value = rt[k].Continent;
					sp.appendChild(op);
				}
		}).catch( error => console.error("Hubo un error #1: ",error));
	},
	
	//cargar las ciudades del pais seleccionado
	ciudadesCargar : (cuales="") => {
		var ciudades = "?ciudades";
		if(cuales != ""){
			ciudades += "&cc=" + cuales;
		}
		document.querySelector("#lista-ciudades").innerHTML = "";
		fetch(app.url + ciudades)
			.then(response => response.json())
			.then(rt => {
				var lc = document.querySelector("#lista-ciudades");
				for(var k in rt){
					var tr = document.createElement("tr");
					tr.setAttribute("id",rt[k].ID);

					var td = document.createElement("td");
					var txt = document.createTextNode(rt[k].Name);
					td.appendChild(txt);
					tr.appendChild(td);

					td = document.createElement("td");
					td.innerHTML = rt[k].CountryCode;
					tr.appendChild(td);
					
					td = document.createElement("td");
					td.innerHTML = rt[k].Population;
					tr.appendChild(td);

					td = document.createElement("td");
					td.innerHTML = `
									<button type="button" class="btn btn-secondary" onclick="app.ciudadEditar('${rt[k].ID}')">Editar</button>
									<button type="button" class="btn btn-danger" onclick="app.ciudadEliminar('${rt[k].ID}',this)">Eliminar</button>
								   `;
					tr.appendChild(td);

					lc.appendChild(tr);
				}
			}).catch( error => console.error("Hubo un error 2: ",error))
		},

		ciudadGuardar : (e) => {
			e.preventDefault();
			$("#modal-insertar-ciudad").modal('hide');
			var datos = new FormData();
			datos.append("CountryCode",document.querySelector("#pais").value);
			datos.append("Name",document.querySelector("#Name").value);
			datos.append("District",document.querySelector("#District").value);
			datos.append("Population",document.querySelector("#Population").value);
			const idciudad = document.querySelector("#idciudad").value;
			if(idciudad != ""){
				datos.append("idciudad",idciudad);
			}else{
				datos.append("nuevaciudad",null);
			}
			
			fetch(app.url,{
					method: "POST",
					body: datos
			}).then(rt => {				
				if(rt == 'false'){
					alert("Fallo al insertar/actualizar el registro de ciudad");
				}else{
					console.log(rt);
					app.ciudadesCargar(document.querySelector("#pais").value);
				}
			}).catch( error => console.error("Hubo un error #3: ",error));
		},
		
		
		ciudadEliminar : (id,fila) => {
			var ciudadEliminar = "?ciudadEliminar";
			if(id != ""){
				ciudadEliminar += "&idciudad=" + id;
			}
			if(confirm("¿Está seguro de eliminar esta ciudad?")){
				fetch(app.url + ciudadEliminar)
					.then(rt => {
						if(rt == 'false'){
							alert("No se pudo eliminar");
						}else{
							console.log(rt);
						}
				}).catch( error => console.error("Hubo un error #4: ",error));
			}
			var i = fila.parentNode.parentNode.rowIndex;
			document.querySelector("#tciudades").deleteRow(i);
		},
		
		ciudadEditar : (id) => {
			fetch(app.url + "?ciudad&id=" + id)
			.then(response => response.json())
			.then(rt => {				
				document.querySelector("#idciudad").value = rt[0].id;
				document.querySelector("#Name").value = rt[0].Name;
				document.querySelector("#District").value = rt[0].District;
				document.querySelector("#Population").value = rt[0].Population; 
			}).catch( error => console.error("Hubo un error #5: ",error));
			$("#modal-insertar-ciudad").modal("show");
		}
}
