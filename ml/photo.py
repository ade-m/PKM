import cv2
import json
from ultralytics import YOLO
import supervision as sv

model = YOLO("basil.pt")


def main():
    # Load an image from file
    img = cv2.imread('foto/1.jpg')
    
    img = cv2.resize(img, (1000,720))
    
    box_annotator = sv.BoxAnnotator(
        thickness=1,
        text_thickness=1,
        text_scale=0.5
    )

    result = model(img, conf=0.1)[0]
    detections = sv.Detections.from_yolov8(result)

    labels = [
        f"{model.model.names[class_id]} {confidence*100:0.1f}%"
        for _, confidence, class_id, _
        in detections
    ]
    
   
        
    annotated_img = box_annotator.annotate(
        scene=img, 
        detections=detections, 
        labels=labels
    )

    annotated_img = cv2.resize(annotated_img, (1080, 720))
    cv2.imshow("yolov8", annotated_img)
    cv2.waitKey(0)
    cv2.destroyAllWindows()

if __name__ == "__main__":
    main()
