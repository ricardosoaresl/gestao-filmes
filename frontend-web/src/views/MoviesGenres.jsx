import React, { useRef, useState, useEffect } from "react";
import { Row, Col, Form, Nav } from "react-bootstrap";
import Card from 'react-bootstrap/Card'
import Breadcrumb from 'react-bootstrap/Breadcrumb'
import 'bootstrap/dist/css/bootstrap.min.css';
import { Link } from "react-router-dom";

import BaseService from "../services/base.services";

export default function MoviesGenres({ genero }) {
  const basrUrlImage = "https://image.tmdb.org/t/p/original/";
  const [movies, setMovies] = useState([]);
  const [display, setDisplay] = useState(false);

  useEffect(() => {
    BaseService.get(`discover?genres=${genero.id}`).then(response => {
      setMovies(response.data.results);
    });
  }, []);

  return (
    <>
      <Breadcrumb key={genero.id}>
        <Breadcrumb.Item href="#" onClick={() => setDisplay(!display)}>{genero.name}</Breadcrumb.Item>
      </Breadcrumb>
      {movies.length > 0 && display && (
        <Col lg={12} sm={12}>
          <Row>
            {movies.map(movie => (
              movie.poster_path && (
                <Col lg={3} sm={12}>
                  <Card style={{ width: '100%' }}>
                    <Card.Img variant="top"
                      src={basrUrlImage + movie.poster_path} />
                    <Card.Body>
                      <Card.Title>{movie.original_title}</Card.Title>
                      <Card.Text>{movie.overview}</Card.Text>
                      <Link
                        to={`/admin/movie/${movie.id}`}
                        className="btn btn-clean btn-md btn-icon"
                        title="Ver Filme"
                        style={{ marginRight: 5 }}
                      >
                        Ver Filme
                      </Link>
                    </Card.Body>
                  </Card>
                </Col>
              )
            ))}
          </Row>
        </Col>
      )}
    </>
  );
}

