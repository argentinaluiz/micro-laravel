import {RouteProps} from "react-router-dom";
import Dashboard from "../pages/Dashboard";
import CategoryList from "../pages/category/PageList";
import CastMembersList from "../pages/cast-member/PageList";
import GenreList from "../pages/genre/PageList";
import CategoryForm from "../pages/category/PageForm";
import CastMembersForm from "../pages/cast-member/PageForm";
import GenreForm from "../pages/genre/PageForm";

export interface MYRouteProps extends RouteProps
{
    name: string,
    label: string
}

const routes = [
    {
        name: 'dashboard',
        label: "Dashboard",
        path: "/",
        component: Dashboard,
        exact: true
    },
    {
        name: 'categories.list',
        label: "Listar categorias",
        path: "/categories",
        component: CategoryList,
        exact: true
    },
    {
        name: 'categories.create',
        label: "Criar categorias",
        path: "/categories/create",
        component: CategoryForm,
        exact: true
    },
    {
        name: 'categories.edit',
        label: "Editar categorias",
        path: "/categories/:id/edit",
        component: CategoryForm,
        exact: true
    },
    {
        name: 'cast_members.list',
        label: "Listar membros de elencos",
        path: "/cast-members",
        component: CastMembersList,
        exact: true
    },
    {
        name: 'cast_members.create',
        label: "Criar membros de elencos",
        path: "/cast-members/create",
        component: CastMembersForm,
        exact: true
    },
    {
        name: 'genre.list',
        label: "Listar gêneros",
        path: "/genres",
        component: GenreList,
        exact: true
    },
    {
        name: 'genre.create',
        label: "Criar gênero",
        path: "/genres/create",
        component: GenreForm,
        exact: true
    }
];

export default routes;