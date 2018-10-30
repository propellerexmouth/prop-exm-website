import React from 'react';
import { Link } from 'gatsby';

import Layout from '../components/layout';
import Header from '../components/header';

const ContactPage = () => (
  <Layout>
    <Header />
    <h1>Contact us</h1>
    <Link to="/">Go back to the homepage</Link>
  </Layout>
)

export default ContactPage
