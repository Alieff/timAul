define({ "api": [
  {
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "varname1",
            "description": "<p>No type.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "varname2",
            "description": "<p>With type.</p>"
          }
        ]
      }
    },
    "type": "",
    "url": "",
    "version": "0.0.0",
    "filename": "./doc/main.js",
    "group": "E__Dev_xampp_htdocs_apidoctest_doc_main_js",
    "groupTitle": "E__Dev_xampp_htdocs_apidoctest_doc_main_js",
    "name": ""
  },
  {
    "type": "get",
    "url": "/user",
    "title": "Request User Information",
    "name": "GetUser",
    "group": "User",
    "version": "0.2.0",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>The users name.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "age",
            "description": "<p>Calculated age from Birthday.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Example data on success:",
          "content": "{\nname: 'Ega'\nage: 19\n}",
          "type": "json"
        }
      ]
    },
    "filename": "./test.js",
    "groupTitle": "User"
  },
  {
    "type": "get",
    "url": "/user",
    "title": "Request User Information",
    "name": "GetUser",
    "group": "User",
    "version": "0.1.0",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>The users name.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Example data on success:",
          "content": "{\nname: 'Ega'\n}",
          "type": "json"
        }
      ]
    },
    "filename": "./_apidoc.js",
    "groupTitle": "User"
  },
  {
    "type": "put",
    "url": "/user",
    "title": "Change User",
    "name": "PutUser",
    "group": "User",
    "version": "0.1.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>New name of the user.</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "NameEmptyError",
            "description": "<p>The name was empty. Minimum of <code>1</code> character is required.</p>"
          }
        ]
      }
    },
    "filename": "./test.js",
    "groupTitle": "User"
  }
] });
