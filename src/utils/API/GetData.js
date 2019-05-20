import { header_local, API_URL } from "./Headers";

export const GetDataAPI = async (base, cmd="", parameters="") => {
  
    const headers = header_local()
    
    const response = await fetch(`${API_URL}${base}${'?'}${cmd}${parameters}`,{headers})
    const json = await response.json()
    let data = {
      status: response.status,
      data: json
    }
  
    return data
  }