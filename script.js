
    window.addEventListener('DOMContentLoaded', ()=>{
    const search = document.querySelector('#busqueda')
    const tableContainer = document.querySelector('#resul tbody')
    const contetResul = document.querySelector('#results-container')
    const contentError = document.querySelector('.errorsContainer')
        
    let search_criterial = ''
    let url ='./php/searchData.php' 

    if (search){
        search.addEventListener('input', event =>{
            search_criterial = event.target.value.toUpperCase()
            showResult()
        })

    }
    
    // función que se enaragara de enviar la petición al servidor.
    const searchData = async () => {
        let searchData = new FormData()
        searchData.append("busqueda", search_criterial)

        try {
            const response = await fetch(url,{
                method: 'POST',
                body: searchData
            })

            console.log(response.ok)
          
            return response.json()


            
        } catch (error) {
            alert('${"Hubo un error y no podemos procesar la peticion en este momento razon: "}${error.message}')
            console.log(error.message)
        }
    }

    // función para mostar los datos 

    const showResult = () =>{
        searchData()
        .then(Result =>{
            console.log(Result)
        })
    }
})