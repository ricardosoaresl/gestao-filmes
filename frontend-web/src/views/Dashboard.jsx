import React, { useRef, useState, useEffect } from "react";
import { Row, Col, Form } from "react-bootstrap";
import Carousel from 'react-bootstrap/Carousel';
import Card from 'react-bootstrap/Card'
import 'bootstrap/dist/css/bootstrap.min.css';


import BaseService from "../services/base.services";

export default function Dashboard() {
  const basrUrlImage = "https://image.tmdb.org/t/p/original/";
  const [banners, setBanners] = useState([]);
  const [movies, setMovies] = useState([]);

  useEffect(() => {
    BaseService.get("trending").then(response => {
      setBanners(JSON.parse(response.data).results);
    });
  }, []);

  useEffect(() => {
    console.log(movies);
  }, [movies]);

  const handleSearch = (key) => {
    if (key.target.value.length > 3) {
      BaseService.get(`search?name=${key.target.value}`).then(response => {
        setMovies(JSON.parse(response.data).results);
      });
    } else if (key.target.value.length <= 0) {
      setMovies([]);
    }
  };

  return (
    <div className="content">
      <Row>
        <Col lg={12} sm={12}>
          {banners.length > 0 && (
            <Carousel
              indicators={true}
              slide={true}
              className="m-auto"
              style={{ width: "100%", height: 400 }}>
              {banners.map(banner => (
                <Carousel.Item style={{ width: "100%", height: 400 }} key={banner.id}>
                  <img
                    className="d-block w-100"
                    src={basrUrlImage + banner.backdrop_path}
                    alt={banner.original_title}
                  />
                  <Carousel.Caption>
                    <h3>{banner.original_title}</h3>
                    <p>{banner.overview}</p>
                  </Carousel.Caption>
                </Carousel.Item>
              ))}
            </Carousel>
          )}
        </Col>
        <Col lg={12} sm={12}>
          <Form.Group style={{ marginTop: 50 }}>
            <Form.Control size="lg" type="text" placeholder="Procurar por títulos" onKeyPress={handleSearch} />
            <br />
          </Form.Group>
        </Col>

        {movies.length > 0 && (
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
                        {/* <Button variant="primary">Go somewhere</Button> */}
                      </Card.Body>
                    </Card>
                  </Col>
                )
              ))}
            </Row>
          </Col>
        )}
      </Row>
    </div>
  );
}
