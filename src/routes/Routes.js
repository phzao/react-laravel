import SearchMovie from "../views/list/search"
import ListMovies from "../views/list/upcoming";
import Home from "../views/home";

const Routes = [
  {
    path: "/",
    component: Home,
    exact: true
  },
   {
    path: "/coming-soon",
    component: ListMovies ,
    exact: true
  },
  {
    path: "/search-movie",
    component: SearchMovie ,
    exact: true
  }
];

export default Routes
