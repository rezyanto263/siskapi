import { Fancybox } from "@fancyapps/ui/dist/fancybox/";
import "@fancyapps/ui/dist/fancybox/fancybox.css";
import uploadImagePreview from "../../components/uploadImagePreview";

// Fancybox
Fancybox.bind('[data-fancybox]');

// Upload Image Preview
uploadImagePreview(document.querySelector('#changeCertificate'), document.querySelector('#certificateContainer'));
