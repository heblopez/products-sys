
document.addEventListener('DOMContentLoaded', function() {
  loadWarehouses();
  loadLocations();
  loadCurrencies();
})

function loadWarehouses() {
  fetch('get_warehouses.php')
    .then(response => response.json())
    .then(data => {
      const bodegas = document.getElementById('bodegas');
      data.forEach(bodega => {
        const option = document.createElement('option');
        option.value = bodega.id;
        option.text = bodega.nombre;
        bodegas.appendChild(option);
      });
    })
    .catch(error => console.error(error));
}

function loadLocations() {
  fetch('get_locations.php')
    .then(response => response.json())
    .then(data => {
      const sucursales = document.getElementById('sucursales');
      data.forEach(sucursal => {
        const option = document.createElement('option');
        option.value = sucursal.id;
        option.text = sucursal.nombre;
        sucursales.appendChild(option);
      });
    })
    .catch(error => console.error(error));
}

function loadCurrencies() {
  fetch('get_currencies.php')
    .then(response => response.json())
    .then(data => {
      const monedas = document.getElementById('monedas');
      data.forEach(moneda => {
        const option = document.createElement('option');
        option.value = moneda.id;
        option.text = moneda.nombre;
        monedas.appendChild(option);
      });
    })
    .catch(error => console.error(error));
}

function validateForm(ev) {
  ev.preventDefault();
  const form = document.getElementById('productForm');
  const codigo = form.codigo.value;
  const nombre = form.nombre.value;
  const precio = form.precio.value;

  const checkedCheckboxes = document.querySelectorAll('input[name="materiales"]:checked');
  const materiales = Array.from(checkedCheckboxes).map(checkbox => checkbox.value);

  const descripcion = form.descripcion.value;
  const bodegas = form.bodegas.value;
  const sucursales = form.sucursales.value;
  const monedas = form.monedas.value;

  const errors = [];

  if (codigo) {
    const regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]+$/;
    if (!regex.test(codigo)) {
      errors.push('El código del producto debe contener letras y números.');
    }

    if (codigo.length < 5 || codigo.length > 15) {
      errors.push('El código del producto debe tener entre 5 y 15 caracteres.');
    }
    // Pendiente: Validar si existe en la BD
  } else {
    errors.push('El código del producto no puede estar en blanco.');
  }

  if (nombre) {
    if (nombre.length < 2 || nombre.length > 50) {
      alert('El nombre del producto debe tener entre 2 y 50 caracteres.')
    }
  } else {
    errors.push('El nombre del producto no puede estar en blanco.');
  }

  if (precio) {
    const regex = /^\d+(\.\d{1,2})?$/;
    if (!regex.test(precio)) {
      errors.push('El precio del producto debe ser un número positivo con hasta dos decimales.');
    }
  } else {
    errors.push('El precio del producto no puede estar en blanco.');
  }

  !materiales.length >= 2  && errors.push('Debe seleccionar al menos dos materiales para el producto.');
  !bodegas && errors.push('Debe seleccionar una bodega.');
  !sucursales && errors.push('Debe seleccionar una sucursal para la bodega seleccionada.');
  !monedas && errors.push('Debe seleccionar una moneda para el producto.');

  if (descripcion) {
    if (descripcion.length < 10 || descripcion.length > 1000) {
      errors.push('La descripción del producto debe tener entre 10 y 1000 caracteres.');
    }
  } else {
    errors.push('La descripción del producto no puede estar en blanco.');
  }

  if (errors.length > 0) {
    errors.forEach(error => alert(error));
    return;
  }

  const dataToSubmit = {
    'codigo': codigo,
    'nombre': nombre,
    'bodega_id': bodegas,
    'sucursal_id': sucursales,
    'moneda_id': monedas,
    'precio': precio,
    'materiales': materiales,
    'descripcion': descripcion
  };
  console.log('Todo OK')
  console.log(dataToSubmit)
}

document.getElementById('productForm').addEventListener('submit', validateForm);
