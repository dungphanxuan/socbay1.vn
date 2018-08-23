# Show Current User

Get the details of the currently Authenticated User along with basic
subscription information.

**URL** : `/api/user/`

**Method** : `GET`

**Auth required** : YES

**Permissions required** : None

## Success Response

**Code** : `200 OK`

**Content examples**

For a User with ID 1234 on the local database where that User has saved an
email address and name information.

```json
{
    "id": 1234,
    "first_name": "Joe",
    "last_name": "Bloggs",
    "email": "joe25@example.com"
}
```

For a user with ID 4321 on the local database but no details have been set yet.

```json
{
    "id": 4321,
    "first_name": "",
    "last_name": "",
    "email": ""
}
```

### Properties

| Property | Type | Description |
|:---------|:-----|:------------|
| **id**   | String | Unique identifier for the book. |
| **title** | String | The title of the book. |
| **description** | String | Descriptive text for the book, including an abstract. |
| **authors** | Collection([Author](author.md)) | A collection of author resources that represent the authors of the book. |
| **purchaseUrl** | String - URL | A fully qualified URL to the purchase page for this book. |
| **lastModifiedDatetime** | DateTime | The date and time the book record was last modified. |
| **costs** | [Costs](costs.md) | A collection of properties that define the cost structure for the book. |


## Notes

* If the User does not have a `UserInfo` instance when requested then one will
  be created for them.
