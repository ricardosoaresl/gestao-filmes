import React, { useRef, useState, useEffect } from "react";
import { Row, Col, Form } from "react-bootstrap";
import 'bootstrap/dist/css/bootstrap.min.css';

import MoviesGenres from "./MoviesGenres"

import BaseService from "../services/base.services";

export default function Discover() {
  const [generos, setGeneros] = useState([]);

  useEffect(() => {
    BaseService.get("genres").then(response => {
      setGeneros(JSON.parse(response.data).genres);
    });
  }, []);

  return (
    <div className="content">
      <Row>
        {generos.length > 0 && (
          <Col lg={12} sm={12}>
            {generos.map(genero => (
              <MoviesGenres genero={genero} key={genero.id} />
            ))}
          </Col>
        )}
      </Row>
    </div>
  );
}

