import { capitalize } from "../String/capitalize";

export const TMDB = "/TMDAPIs"
export const UPCOMING = "cmd=getUpcomingMovies"
export const SEARCHMOVIE = "cmd=getFilteredMovies"

export const DESTINATION = {
    TMDB,
    UPCOMING
};

export const getRoute = (modelName) => {
    return DESTINATION[capitalize(modelName)]
}