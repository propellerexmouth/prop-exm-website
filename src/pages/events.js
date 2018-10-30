import React from 'react';
import { Link } from 'gatsby';

import Layout from '../components/layout';
import Header from '../components/header';

const EventsPage = () => (
  <Layout>
    <Header />
    <h1>Events</h1>
    <Link to="/">Go back to the homepage</Link>
  </Layout>
)

export default EventsPage
