app.factory('textos', function($http) {
    return {
        Genericos: {
            Enviando: "Enviando...",
            PerfectoTitle: "",
            Error: "Temporalmente no está disponible el acceso a la aplicación Mi Claro, por favor intenta más tarde.",
            ErrorTitle: "Mi Claro",
            ErrorRegisterTitle: "Registro No Exitoso",
            TitleMessage: "Mi Claro",
            Ok: "Aceptar",
            act: "Actualizar",
            Cerrar: "Cerrar",
            Cancelar: "Cancelar",
            Cancelado: "Cancelado",
            Eliminado: "Eliminado",
            Validar: "Validando...",
            Cargando: "Cargando...",
            Sesion: "Iniciando sesión...",
            Selecnume: "Debes seleccionar un número.",
            TermiyCondici: "Debes aceptar los términos y condiciones.",
            Transacexitosa: "Operación realizada exitosamente.",
            CantNumeros: "Debes ingresar un número de 8 o 10 dígitos.",
            textcerrarsesion: "¿Estás seguro que  deseas cerrar sesión en la aplicación?",
            crrsesion: "Cerrar sesión",
            nocuentas: "Actualmente no cuentas con recargas disponibles.",
            nvalido: "Debes ingresar un número valido.",
            smsvacio: "No se ha encontrado información",
            textcambiarcorreo: "¿Estás seguro de que deseas actualizar tu correo electrónico de acceso? ",
            sugerencia: "Debes diligencias tus sugerencias"
        },
        Registro: {
            R1: "Debes ingresar un número de identificación válido.",
            R3: "Debes ingresar un Número de Cuenta Hogar / Movil Claro válido.",
            R4: "Debes ingresar un número de identificación válido.",
            R5: "Debes ingresar un Número de Cuenta Hogar / Movil Claro válido.",
            R6: "Debes diligenciar el correo electrónico.",
            R7: "Por seguridad tu contraseña debe contener como mínimo una letra mayúscula, una minúscula, un número y mínimo 6 carácteres.",
            R8: "Las contraseñas no coinciden.",
            R9: "PIN incorrecto.",
            R10: "Tipo de documento no válido.",
            R11: "Debes aceptar los términos y condiciones.",
            R12: "Debes ingresar la fecha de expedición.",
            R13: "Debes ingresar tu primer apellido.",
            R14: "La línea que intentas asociar no coincide con el número de documento registrado en nuestro sistema, por favor verifica que el número de documento sea el correcto. De lo contrario te invitamos a que realices la actualización de los datos de registro.",
            R15: "No se pudo realizar la actualizacion de tus datos, intenta nuevamente.",
            R16: "Te informamos que tu servicio contratado no permite asociar productos móviles.",
            R17: "Validación ReCaptcha fallida.",
            R18: "Por seguridad tu contraseña no debe contener ñ y/o tildes.",
            R19: "Debes ingresar una dirección de correo válida.",
            R20: "Debes ingresar tu correo electrónico.",
            R21: "Debes ingresar tu segundo apellido.",
            R22: "Debes ingresar tu nombre.",
            R23: "La línea que intentas asociar no coincide con el número de documento registrado en nuestro sistema. Verifica que el número de documento sea el correcto. De lo contrario, te invitamos a realizar el registro de la línea."
        },
        AsociarProducto: {
            AP1: "El producto que intentas asociar no coincide con tu número de documento."
        },
        Login: {
            L1: "Debes ingresar una dirección de correo válida.",
            L2: "Debes ingresar una contraseña válida."
        },
        PostpagoPagoElegidos: {
            PPE1: "¿Eliminar?",
            PPE2: "¿Estás seguro que deseas eliminar este Elegido Claro?",
            PPE3: "No se ha realizado ningún cambio.",
            PPE4: "El elegido fue eliminado.",
            PPE5: "El nombre del elegido no es válido.",
            PPE6: "El número del elegido no es válido.",
            PPE7: "El número ya se encuentra registrado.",
            PPE8: "Valida el número Elegido Todo Destino ingresado, si es número Móvil digita los 10 dígitos y si es número fijo digita: 03 + indicativo de ciudad + número fijo de 7 dígitos (en total 10 dígitos)."
        },
        PrepagoPagoElegidos: {
            PPE2: "¿Estás seguro que deseas eliminar este Elegido Claro?",
            PPE3: "El número ingresado ya se encuentra registrado."
        },
        PrepagoAgregarAmigos: {
            PPE2: "¿Estás seguro de eliminar este amigo?",
            PPE3: "El número ya se encuentra registrado.",
            PPE4: "El número amigo no es válido.",
            PPE5: "¿Estás seguro que deseas eliminar este Amigo Claro?",
        },
        PostAsociarproducto: {
            PAP1: "El producto a asociar no es válido.",
            PAP2: "El PIN no es válido."
        },
        PostRegistrarImei: {
            PRI1: "Debes aceptar la autorización.",
            PRI2: "El archivo no tiene el formato correcto.",
            PRI3: "Debes cargar la factura de compra.",
            PRI4: "El serial ingresado no corresponde con el serial del equipo que dispones a registrar.",
            PRI5: "Se ha recibido la información del equipo de forma exitosa. En unos momentos recibirá un SMS con el resultado del registro del equipo."
        },
        PreRegistrarImei: {
            PRI1: "Debes aceptar la autorización.",
            PRI2: "El archivo no tiene el formato correcto.",
            PRI3: "Debes cargar la factura de compra.",
            PRI4: "El serial ingresado no corresponde con el serial del equipo que dispones a registrar.",
            PRI5: "Se ha recibido la información del equipo de forma exitosa. En unos momentos recibirás un SMS con el resultado del registro del equipo."
        },
        PostConvenioElectronico: {
            PCE1: "El número no es válido.",
            PCE2: "El correo no es válido.",
            PCE3: "¿Estás seguro de desactivar el Convenio electrónico?"
        },
        PostConsumoDeDatos: {
            PCD1: "El sistema no reporta compra de paquetes."
        },
        PostCambioDeNumero: {
            PCDN1: "El cambio en tu línea se verá reflejado en máximo: ",
            PCDN2: " días.",
            PCDN3: "El número asignado fue: "
        },
        PagaFacturaHogar: {
            PFH1: "Factura enviada exitosamente a: ",
            PFH2: "Error al registrar el correo."
        },
        PostCambioPlan: {
            PCP1: "No se ha realizado ningún cambio.",
            PCP2: "Cambio plan",
            PCP3: "¿Estás seguro que deseas cambiar de plan a ",
            PCP4: "?"
        },
        PostDatosCompartidos: {
            PDCO: "Llegaste al límite de los números Claro de tu lista.",
            PDC1: "Debes ingresar un número válido.",
            PDC2: "Debes ingresar una cantidad en Gb válida.",
            PDC3: "Por cada número que inscribas, mensualmente verás reflejado en tu factura el cobro de ",
            PDC4: "El cupo asignado no es válido, no debe superar el cupo disponible: ",
            PDC5: "El número debe ser diferente.",
            PDC6: "El cupo asignado no es válido, el valor debe ser superior a 0.1GB.",
            PDC8: "El numero no es válido.",
            PDC9: "Modificar el número: ",
            PDC10: " tendrá el costo de: ",
            PDC11: " Imp Incl. ¿Deseas continuar con la inscripción del número?.",
            PDC12: "El cupo asignado no es válido, el valor debe ser menor a los datos disponibles: ",
            PDC13: "Debes editar el número",
            PDC14: "Por cada número eliminado, mensualmente verás reflejado en tu factura el cobro de ",
            PDC15: " Imp Incl. ¿Deseas continuar eliminando el número?",
            // Si eliminas este número, a partir de este momento dejaras de compartirle datos.
        },
        PostDatosfg: {
            PDFGO: "Llegaste al límite de los números Claro de tu lista.",
            PDFG1: "Debes ingresar un número móvil o fijo válido.",
            PDFG2: "Debes ingresar una cantidad en Gb válida.",
            PDFG3: "Por cada número que inscribas, mensualmente verás reflejado en tu factura el cobro de ",
            PDFG4: "El cupo asignado no es válido, no debe superar el cupo disponible: ",
            PDFG5: "El número debe ser diferente.",
            PDFG6: "El cupo asignado no es válido, el valor debe ser superior a 0.1GB.",
            PDFG8: "El numero no es válido.",
            PDFG9: "Modificar el número: ",
            PDFG10: " tendrá el costo de: ",
            PDFG11: " Imp Incl. ¿Deseas continuar con la inscripción del número?",
            PDFG12: "El cupo asignado no es válido, el valor debe ser menor a los datos disponibles: ",
            PDFG13: "Por cada número eliminado, mensualmente verás reflejado en tu factura el cobro de",
            PDFG14: " Imp Incl. ¿Deseas eliminar el número?",
            PDFG15: "Por cada número modificado, mensualmente verás reflejado en tu factura el cobro de",
            PDFG16: " Imp Incl. ¿Deseas continuar modificando el número?"
            // Si eliminas este número, a partir de este momento dejaras de compartirle datos.
        },
        PreCambioPlan: {
            PCP1: "No se ha realizado ningún cambio.",
            PCP2: "Cambio plan",
            PCP3: "¿Estás seguro que deseas cambiar de plan a ",
            PCP4: "?"
        },
        HogarCambioWifi: {
            HCW1: "Por seguridad tu contraseña debe contener como mínimo 6 carácteres.",
            HCW2: "Debes ingresar un nuevo nombre de SSID o clave para actualizar la información.",
            HCW3: "El nombre de SSID debe contener solo letras o números.",
            HCW4: "¿Estás seguro que quieres cambiar el método de cifrado a "
        },
        HogarGps: {
            HG1: "Debes seleccionar un motivo de cancelación.",
            HG2: "El técnico no se encuentra disponible aún. Esta sección se activará una vez el técnico se dirija hacia tu domicilio.",
            HG3: "Aún no es posible realizar la calificación, inténtalo de nuevo al finalizar la visita.",
            HG4: "Debes seleccionar una calificación.",
            HG5: "No es posible reagendar tu visita, porque ya se ha iniciado.",
            HG6: "No es posible cancelar tu visita, porque ya se ha iniciado.",
            HG7: "El técnico ya ha llegado a su destino.",
            HG8: "Debes ingresar tus observaciones.",
            HG9: "Debes ingresar el correo electrónico de tu amigo.",
            HG10: "Debes ingresar el nombre de tu amigo.",
            HG11: "Debes seleccionar un motivo.",
            HG12: "Debes proporcionar una fecha válida.",
            HG13: "Debes seleccionar una franja válida.",
            HG14: "En este momento no tenemos cupos disponibles para reagendar.",
            HG15: "En este momento no tenemos información disponible, intenta más tarde."
        },
        FormCambioClave: {
            FCC1: "Por seguridad tu contraseña debe contener como mínimo una letra mayúscula, una minúscula, un número y mínimo 6 carácteres.",
            FCC2: "La contraseña ingresada no coincide con tu contraseña actual.",
            FCC3: "Las contraseñas no coinciden.",
            FCC4: "Se desasociará la siguiente cuenta de tu aplicación: ",
            FCC5: "Por seguridad tu contraseña no debe contener ñ y/o tildes."

        },
        PreAdminitarPaquetes: {
            PADP1: "¿Estás seguro que deseas desactivar tus datos por demanda?.",
            PADP2: "¿Estás seguro que deseas activar tus datos por demanda?.",
            PADP3: "Activar",
            PADP4: "Desactivar"
        },
        PreDetalleConsumoSaldo: {
            PDCS1: "¿Estás seguro que deseas comprar este paquete?. ",
            PADP2: "¿Estás seguro que quieres desactivar recurrencia?.",
            PADP3: "Cancelar",
            PADP4: "Comprar",
            PADP5: "Desactivar"
        },
        FormCambioCorreo: {
            FRCC1: "Debes ingresar una dirección de correo válida.",
            FRCC2: "Los correos no coinciden.",
        },
        PostRenuevaTuEquipo: {
            PRTE1: "Debes seleccionar un color.",
            PRTE2: "Debes seleccionar un departamento.",
            PRTE3: "Debes seleccionar una cuidad.",
            PRTE4: "Debes ingresar una dirección válida.",
            PRTE5: "Debes ingresar un número móvil válido.",
            PRTE6: "Debes diligenciar el correo electrónico.",
        },
        PostpagoPagoElegidosTexto: {
            PET1: "¿Estás seguro que deseas eliminar este Elegido de Texto?",
            PET2: "Debes ingresar un Número Móvil Claro válido.",
            PPT3: "El número ingresado ya se encuentra registrado.",
            PPT4: "Valida el Número Móvil Claro ingresado."
        },
        PostDetallePlan: {
            PDP1: "Actualmente no cuentas con paquetes adicionales."
        },
        PostDetallePlanAdd: {
            PDPA1: "Tu nuevo plan es: ",
            PDPA2: " Por un costo de: ",
            PDPA3: " y será activado a partir de tu próxima fecha de corte.",
            PDPA4: "¿Estas seguro?",
            PDPA5: "Deseas adquirir el plan "
        }
    };
})
