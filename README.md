# Star Wars Coding Challenge

This API provides the valuable information you will need to defeat the Galactic Empire. Use it wisely young Jedi.

## API Endpoints

### Luke Skywalker

Get information about Luke Skywalker. Specifically, the names of all the starships he piloted.

**URL** : `/api/people/luke-skywalker/`

**Method** : `GET`

**Success Response Attributes:**

| Name      | Type  | Description                                            |
|-----------|-------|--------------------------------------------------------|
| starships | array | The names of the starships that Luke Skywalker piloted |

**Success Response Example:**
```
HTTP/1.0 200 OK
Content-Type: application/json

{
"starships": ["X-wing","Rebel transport","Millennium Falcon"]
}
```
---

### Episode 1

Get information about Episode 1. Specifically, the classifications of all species in the film

**URL** : `/api/films/episode-1/`

**Method** : `GET`

**Success Response Attributes**

| Name            | Type  | Description                                           |
|-----------------|-------|-------------------------------------------------------|
| classifications | array | The classifications of all species in the 1st episode |

**Success Response Example:**
```
HTTP/1.0 200 OK
Content-Type: application/json

{
"classifications": ["amphibian","mammal"]
}
```

---

### Planets in the Galaxy

Get information about all planets in the galaxy. Specifically, the total population of all such planets.

**URL** : `/api/planets/galaxy/`

**Method** : `GET`

**Success Response Attributes**

| Name       | Type | Description                                       |
|------------|------|---------------------------------------------------|
| population | int  | The total population of all planets in the galaxy |

**Success Response Example:**
```
HTTP/1.0 200 OK
Content-Type: application/json

{
"population": 123456
}
```
